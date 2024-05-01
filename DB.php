<?php

class Database{
public function getConnection()
{
  return  $conn=new mysqli("localhost","root","","clinic1");

}

}

?>