<?php

namespace App\Http\Controllers;

use App\Models\Beneficiarios;
use App\Models\Coordinador;
use App\Models\Representante;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{

    public function generar()
    {
        $coordinador = Coordinador::all();
        return view('listados.down', compact('coordinador'));
    }

    public function getRepresentantes($coordinador_id)
    {
        // Obtener representantes que pertenecen al coordinador seleccionado
        $representantes = Representante::where('id_coordinador', $coordinador_id)->get();

        // Retornar respuesta en JSON para AJAX
        return response()->json($representantes);
    }
    public function exportBeneficiarios(Request $request)
    {
        $representante_id = $request->input('repre');

         // Obtener datos del representante y del coordinador
         $representante = Representante::with('coordinador')->find($representante_id);

         $nameRepre = $representante->name . ' ' . $representante->ap_paterno . ' ' . $representante->ap_materno;
         $coordinador = $representante->coordinador->name . ' ' . $representante->coordinador->ap_paterno . ' ' . $representante->coordinador->ap_materno ?? 'No asignado'; // Asegúrate de tener esta relación en el modelo

         // Obtener beneficiarios filtrados
         $beneficiarios = Beneficiarios::where('id_representante', $representante_id)->get();

         // Crear un nuevo Spreadsheet
         $spreadsheet = new Spreadsheet();
         $sheet = $spreadsheet->getActiveSheet();

         // Definir el encabezado
         $sheet->mergeCells('A1:D1');
         $sheet->setCellValue('A1', 'Reporte de Beneficiarios');
         $sheet->getStyle('A1')->getFont()->setSize(14)->setBold(true);
         $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

         $sheet->setCellValue('A2', 'Representante: ' . $nameRepre);
         $sheet->setCellValue('A3', 'Coordinador: ' . $coordinador);

         // Espacio antes de la tabla
         $startRow = 5;

         // Encabezados de la tabla
         $sheet->setCellValue('A' . $startRow, 'No.');
         $sheet->setCellValue('B' . $startRow, 'Nombre');
         $sheet->setCellValue('C' . $startRow, 'Apellido Paterno');
         $sheet->setCellValue('D' . $startRow, 'Apellido Materno');
         $sheet->setCellValue('E' . $startRow, 'Sexo');
         $sheet->setCellValue('F' . $startRow, 'Fecha de Nacimiento');
         $sheet->setCellValue('G' . $startRow, 'Ocupacion');
         $sheet->setCellValue('H' . $startRow, 'Telefono');
         $sheet->setCellValue('I' . $startRow, 'Localidad');
         $sheet->setCellValue('J' . $startRow, 'Direcciones');
         $sheet->setCellValue('K' . $startRow, 'Seccion Electoral');

         // Aplicar negrita a los encabezados
         $sheet->getStyle("A{$startRow}:K{$startRow}")->getFont()->setBold(true);

         // Insertar datos en la tabla
         $row = $startRow + 1;
         foreach ($beneficiarios as $beneficiario) {
             $sheet->setCellValue('A' . $row, $beneficiario->id);
             $sheet->setCellValue('B' . $row, $beneficiario->name);
             $sheet->setCellValue('C' . $row, $beneficiario->ap_paterno);
             $sheet->setCellValue('D' . $row, $beneficiario->ap_materno);
             $sheet->setCellValue('E' . $row, $beneficiario->sexo);
             $sheet->setCellValue('F' . $row, $beneficiario->fech_nac);
             $sheet->setCellValue('G' . $row, $beneficiario->ocupacion);
             $sheet->setCellValue('H' . $row, $beneficiario->telefono);
             $sheet->setCellValue('I' . $row, $beneficiario->localidad);
             $sheet->setCellValue('J' . $row, $beneficiario->direccion);
             $sheet->setCellValue('K' . $row, $beneficiario->ine);
             $row++;
         }

         // Ajustar tamaño de columnas automáticamente
         foreach (range('A', 'D') as $col) {
             $sheet->getColumnDimension($col)->setAutoSize(true);
         }

         // Descargar el archivo
         // Crear el nombre del archivo dinámicamente
        $representanteNombre = str_replace(' ', '_', $nameRepre); // Reemplazar espacios por guiones bajos

        $fileName = 'Beneficiarios_' . $representanteNombre . '.xlsx';

        // Descargar el archivo
        $writer = new Xlsx($spreadsheet);

        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
 }
