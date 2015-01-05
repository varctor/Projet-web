<?php

class photoDB extends photo {

    private $_db;

    //private $_utilisateurArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function Importation($location, $name) {
        try {
            $result = pg_query("INSERT INTO photos (photos,id_album)    VALUES (lo_import('/etc/motd'),1);");
            try {
                ps . setString(1, $name);
                ps . setBinaryStream(2, istreamImage, (int) monImage . length());
                ps . executeUpdate();
            } finally {
                ps . close();
            }
        } finally {
            istreamImage . close();
        }
        
        $doc_oid = 189762345;
        $data = "Ceci écrasera le début de l'objet de grande taille.";
        pg_query($db, "begin");
        $handle = pg_lo_open($db, $doc_oid, "w");
        $data = pg_lo_write($handle, $data);
        pg_query($db, "commit");
        

   pg_query($db, "begin");
   $oid = pg_lo_import($db, '/tmp/lob.dat');
   pg_query($db, "commit");
   
   
// Lecture d'un fichier binaire
$data = file_get_contents('image1.jpg');
// Échappement des données binaires
$escaped = pg_escape_bytea($data);
// Insertion dans la base de données
pg_query("INSERT INTO photo (name, data) VALUES ('Pine trees', '{$escaped}')");
        
    }

    public function AfficheImage($name, $location) {
        try {
            PreparedStatement ps = conn . prepareStatement("select photo from photos where id_album=?");
            try {
                ps . setString(1, name);
                ResultSet rs = ps . executeQuery();
                ;
                try {
                    if (rs . next()) {
                        InputStream istreamImage = rs . getBinaryStream("img");

                        byte[] buffer = new byte[1024];
                        int length = 0;

                        while((length = istreamImage.read(buffer)) != -1) {
                            ostreamImage . write(buffer, 0, length);
                        }
                    }
                } finally {
                    rs . close();
                }
            } finally {
                ps . close();
            }
        } finally {
            ostreamImage . close();
        }
        

   pg_query($db, "begin");
   $oid = pg_lo_create($db);
   $handle = pg_lo_open($db, $oid, "w");
   pg_lo_write($handle, "données objet de grande taille");
   pg_lo_close($handle);
   pg_lo_export($database, $oid, '/tmp/lob.dat');
   pg_query($database, "commit");
   
   
   header('Content-type: image/jpeg');
   
     // Il va rechercher l'oid (Object Identifier) de la photo
  $res = pg_query($db, "select photo from photo where nom_album ='".$this->_nom_album);
  echo "Type du champ titre OID : ", pg_field_type_oid($res, 0);
   
   $image_oid = 189762345;
   pg_query($db, "begin");
   $handle = pg_lo_open($db, $image_oid, "r");
   pg_lo_read_all($handle);
   pg_query($db, "commit");
        
    }

}
