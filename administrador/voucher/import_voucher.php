<?php
include "database.php";
include "class.upload.php";


if (isset($_FILES["name"])) {
    $up = new Upload($_FILES["name"]);
    if ($up->uploaded) {
        $up->Process("./uploads/");
        if ($up->processed) {
            /// leer el archivo excel
            require_once 'PHPExcel/Classes/PHPExcel.php';
            $archivo = "uploads/" . $up->file_dst_name;
            $inputFileType = PHPExcel_IOFactory::identify($archivo);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivo);
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++) {
                $x_viaje_no = $sheet->getCell("A" . $row)->getValue();
                $x_origen = $sheet->getCell("B" . $row)->getValue();
                $x_estado = $sheet->getCell("C" . $row)->getValue();
                $x_nom_pasaj = $sheet->getCell("D" . $row)->getValue();
                $x_tel_pasaj = $sheet->getCell("E" . $row)->getValue();
                $x_movil = $sheet->getCell("F" . $row)->getValue();
                $x_chof = $sheet->getCell("G" . $row)->getValue();
                $x_dni = $sheet->getCell("H" . $row)->getValue();
                $x_marca = $sheet->getCell("I" . $row)->getValue();
                $x_patente = $sheet->getCell("J" . $row)->getValue();
                $x_c_costo = $sheet->getCell("K" . $row)->getValue();
                $x_cc = $sheet->getCell("L" . $row)->getValue();
                $x_c_cont = $sheet->getCell("M" . $row)->getValue();
                $x_traslado = $sheet->getCell("N" . $row)->getValue();
                $x_siniestro = $sheet->getCell("O" . $row)->getValue();
                $x_solicitado = $sheet->getCell("P" . $row)->getValue();


                $x_completado = $sheet->getCell("Q" . $row)->getValue();

                $completado = $x_completado;


                //$Fecha =  "2018-03-27 08:15:00";
                $fecha = date("Y-d-m", strtotime($completado)) . "<br>";
                // salida 27th March, 2018
                
                //echo $fecha;

                //exit();


                $x_destino = $sheet->getCell("R" . $row)->getValue();
                $x_reloj = $sheet->getCell("S" . $row)->getValue();
                $x_peaje = $sheet->getCell("T" . $row)->getValue();
                $x_equipaje = $sheet->getCell("U" . $row)->getValue();
                $x_adicional = $sheet->getCell("V" . $row)->getValue();
                $x_plus = $sheet->getCell("W" . $row)->getValue();
                $x_total = $sheet->getCell("X" . $row)->getValue();
                $x_operador = $sheet->getCell("Y" . $row)->getValue();
                $x_autorizante = $sheet->getCell("Z" . $row)->getValue();
                $x_obs_oper = $sheet->getCell("AA" . $row)->getValue();
                $x_obs_chof = $sheet->getCell("AB" . $row)->getValue();


                $sql = "insert into voucher_nuevos (
                                            viaje_no, 
                                            origen, 
                                            estado, 
                                            nom_pasaj, 
                                            tel_pasaj, 
                                            movil, 
                                            chof, 
                                            dni, 
                                            marca, 
                                            patente,                                 
                                            c_costo,
                                            cc,
                                            c_cont,
                                            traslado,
                                            siniestro,
                                            solicitado,
                                            completado,
                                            destino,
                                            reloj,
                                            peaje,
                                            equipaje,
                                            adicional,
                                            plus,
                                            total,
                                            operador,
                                            autorizante,
                                            obs_chof,
                                            obs_pas,                                            
                                            created_at
                                            ) value ";

                $sql .= " (\"$x_viaje_no\",
                        \"$x_origen\",
                        \"$x_estado\",
                        \"$x_nom_pasaj\",
                        \"$x_tel_pasaj\",
                        \"$x_movil\",
                        \"$x_chof\",
                        \"$x_dni\",
                        \"$x_marca\",                        
                        \"$x_patente\",
                        \"$x_c_costo\",
                        \"$x_cc\",
                        \"$x_c_cont\",
                        \"$x_traslado\",
                        \"$x_siniestro\",
                        \"$x_solicitado\",
                        \"$fecha\",
                        \"$x_destino\",
                        \"$x_reloj\",
                        \"$x_peaje\",
                        \"$x_equipaje\",
                        \"$x_adicional\",
                        \"$x_plus\",
                        \"$x_total\",
                        \"$x_operador\",
                        \"$x_autorizante\",
                        \"$x_obs_oper\",
                        \"$x_obs_chof\",


                        NOW())";
                $con->query($sql);
            }
            unlink($archivo);
        }
    }
}

echo "<script>
window.location = './inicio_voucher.php';
</script>
";
