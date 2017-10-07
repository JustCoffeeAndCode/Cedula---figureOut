<?php

class figure_out{

  private $cedula;
  private $separador;

  private $dia;
  private $mes;
  private $anio;

  private $fecha;

  private $error = False;
  private $error_msg;

  private $error_info = array(
                          "caracteres" => "Error numero de carateres no validos. un identificador debe contener 14 caracteres mas 2 caracteres de separacion.",
                          "edad" => "Error dia de nacimiento tiene que ser entre 1 y 31. Ejemplo 23/09/91.",
                          "mes" => "Error mes de nacimiento tiene que ser entre 1 y 12. Ejemplo 23/01/91, 23/05/91 o 23/012/91.",
                          "anio" => "Error anio de nacimiento tiene que ser entre 0 y 99. Ejemplo 23/01/91, 23/05/22 o 23/012/85."
                        );

  private $departamentos = array(
                            1 => "Boaco",
                            2 => "Carazo",
                            3 => "Chinandega",
                            4 => "Chontales",
                            5 => "Estelí"
                          );

  private $municipios = array(

                          "361" =>	array(1,"Boaco"),
                          "362" =>	array(1,"Camoapa"),
                          "363" =>	array(1,"Santa Lucía"),
                          "364" =>	array(1,"San José Del Remate"),
                          "365" =>	array(1,"San Lorenzo"),
                          "366" =>	array(1,"Teustepe"),

                          "041" =>	array(2,"Jinotepe"),
                          "042" =>	array(2,"Diriamba"),
                          "044" =>	array(2,"Santa Teresa"),
                          "043" =>	array(2,"San Marcos"),
                          "045" =>	array(2,"Dolores"),
                          "046" =>	array(2,"La Paz Carazo"),
                          "047" =>	array(2,"El Rosario"),
                          "048" =>	array(2,"La Conquista"),


                          "081" =>	array(3,"Chinandega"),
                          "082" =>	array(3,"Corinto"),
                          "084" =>	array(3,"Chichigalpa"),
                          "085" =>	array(3,"Posoltega"),
                          "083" =>	array(3,"El Realejo"),
                          "086" =>	array(3,"El Viejo"),
                          "087" =>	array(3,"Puerto Morazán"),
                          "088" =>	array(3,"Somotillo"),
                          "089" =>	array(3,"Villa Nueva"),
                          "090" =>	array(3,"Santo Tomás del Norte"),
                          "091" =>	array(3,"Cinco Pinos"),
                          "092" =>	array(3,"San Francisco Del Norte"),
                          "093" =>	array(3,"San Pedro Del Norte"),

                          "121" =>	array(4,"Juigalpa"),
                          "122" =>	array(4,"Acoyapa"),
                          "123" =>	array(4,"Santo Tomás"),
                          "124" =>	array(4,"Villa Sandino"),
                          "125" =>	array(4,"San Pedro de Lóvago"),
                          "126" =>	array(4,"La Libertad"),
                          "127" =>	array(4,"Santo Domingo"),
                          "128" =>	array(4,"Comalapa"),
                          "129" =>	array(4,"San Francisco Cuapa"),
                          "130" =>	array(4,"El Coral"),

                          "161" =>	array(5,"Estelí"),
                          "162" =>	array(5,"Pueblo Nuevo"),
                          "163" =>	array(5,"Condega"),
                          "164" =>	array(5,"San Juan Limay"),
                          "165" =>	array(5,"La Trinidad"),
                          "166" =>	array(5,"San Nicolás")

  );

  function __construct($cedula,$separador){

    $this->cedula = $cedula;
    $this->separador = $separador;

  }

  public function figure_out(){

    $cedula_en_partes = explode($this->separador,$this->cedula);

    $this->dia = substr($cedula_en_partes[1],0,-4);
    $this->mes = substr($cedula_en_partes[1],2,2);
    $this->anio = substr($cedula_en_partes[1],4,2);

    $this->validate_cedula();

    if(!$this->error){

      $fecha = date($this->anio . '/' . $this->mes . '/' . $this->dia);
      $fecha = DateTime::createFromFormat("y/m/d", $fecha);

      echo $this->departamentos[$this->municipios[126][0]];

    }

  }

  private function validate_cedula(){

      if(strlen($this->cedula) != 16){

        $this->error = True;
        $this->error_msg = $this->error_info['caracteres'];

      }elseif (!is_numeric($this->dia) || ($this->dia < 1 || $this->dia > 31)){

        $this->error = True;
        $this->error_msg = $this->error_info['edad'];

      }elseif (!is_numeric($this->mes) || ($this->mes < 1 || $this->mes > 12)) {

        $this->error = True;
        $this->error_msg = $this->error_info['mes'];
      }elseif (!is_numeric($this->anio) || ($this->anio < 1 || $this->anio > 99)) {

          $this->error = True;
          $this->error_msg = $this->error_info['anio'];
      }

  }

  public function getErrores(){ return $this->error_msg; }

  public function getFecha(){ return $date->format("Y/m/d"); }

}

?>
