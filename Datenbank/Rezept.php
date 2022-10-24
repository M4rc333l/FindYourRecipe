<?php
	 class Rezept{
		
		private $RezeptID="";
		private $Name="";
		private $Rezept_User_ID="";
		private $Kategorien="";
		private $Bild="";
		private $Zubereitung="";
		private $Zuaten="";
		private $Beliebtheit="";

         public function __construct($RezeptID, $Name, $Rezept_User_ID, $Kategorien, $Bild, $Zubereitung, $Zuaten, $Beliebtheit)
         {
             $this->RezeptID = $RezeptID;
             $this->Name = $Name;
             $this->Rezept_User_ID = $Rezept_User_ID;
             $this->Kategorien = $Kategorien;
             $this->Bild = $Bild;
             $this->Zubereitung = $Zubereitung;
             $this->Zuaten = $Zuaten;
             $this->Beliebtheit = $Beliebtheit;
         }
         public function getRezeptID()
         {
             return $this->RezeptID;
         }
         public function getName()
         {
             return $this->Name;
         }
         public function setName($Name)
         {
             $this->Name = $Name;
         }
         public function getRezeptUserID()
         {
             return $this->Rezept_User_ID;
         }
         public function setRezeptUserID($Rezept_User_ID)
         {
             $this->Rezept_User_ID = $Rezept_User_ID;
         }
         public function getKategorien()
         {
             return $this->Kategorien;
         }
         public function setKategorien($Kategorien)
         {
             $this->Kategorien = $Kategorien;
         }
         public function getBild()
         {
             return $this->Bild;
         }
         public function setBild($Bild)
         {
             $this->Bild = $Bild;
         }
         public function getZubereitung()
         {
             return $this->Zubereitung;
         }
         public function setZubereitung($Zubereitung)
         {
             $this->Zubereitung = $Zubereitung;
         }
         public function getZuaten()
         {
             return $this->Zuaten;
         }
         public function setZuaten($Zuaten)
         {
             $this->Zuaten = $Zuaten;
         }
         public function getBeliebtheit()
         {
             return $this->Beliebtheit;
         }
         public function setBeliebtheit($Beliebtheit)
         {
             $this->Beliebtheit = $Beliebtheit;
         }
     }