import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="nivelessat"
)

# función sin parámetros o retorno de valores
def ejemploSelect():
  mycursor = mydb.cursor()

  mycursor.execute("SELECT * FROM equipos WHERE estado=1")

  myresult = mycursor.fetchall()

  for x in myresult:
    print(x)

# La funcion devuelve los equipos activos
def equiposActivos():
  mycursor = mydb.cursor()

  mycursor.execute("SELECT * FROM equipos WHERE estado=1")

  myresult = mycursor.fetchall()

  for x in myresult:
    print(x)
  

def ipEquiposActivos():
  mycursor = mydb.cursor()

  mycursor.execute("SELECT id, nombre, ip, val_min, val_max FROM equipos WHERE estado=1")

  myresult = mycursor.fetchall()

  return myresult
  #for x in myresult:
  #  print(x)
    
# Registra la medida en la base de datos
def registraMadida(paramMedida, paramEquipo):
  medida = paramMedida
  
  idEquipo = paramEquipo

  mycursor = mydb.cursor()

  mycursor.execute("SELECT * FROM equipos WHERE estado=1 AND id="+str(paramEquipo))

  myresult = mycursor.fetchall()

  print(myresult)

  for x in myresult:
    print(x[1])    

  mycursor.close()
###########################################################
# Guarda la medida del equipo en la base de datos
###########################################################
def guardaMedidaxId(idEquipo,medida):
  mycursor = mydb.cursor()

  #sql = "INSERT INTO medidas (valor, fecha_hora, fecha, hora, id_equipo) VALUES ("+srt(medida)+","++",,,)"

  sql = "INSERT INTO `medidas` (`id`, `valor`, `fecha_hora`, `id_equipo`) VALUES (NULL, '"+str(medida)+"', current_timestamp(), '"+str(idEquipo)+"');"
  #val = ("John", "Highway 21")
  mycursor.execute(sql)

  mydb.commit()

  #print(mycursor.rowcount, "record inserted.")

  mycursor.close()

###########################################################
# Guarda el log de errores en la base de datos
###########################################################
def guardaLog(nombreFuncion,mensaje):
  mycursor = mydb.cursor()
  sql = "INSERT INTO `log` (`id`, `fecha`, `funcion`, `mensaje`) VALUES (NULL, current_timestamp(), '"+nombreFuncion+"', '"+mensaje+"');"
  mycursor.execute(sql)
  mydb.commit()
  mycursor.close()

###########################################################
# Guarda la alarma generada en la base de datos
###########################################################
def generaAlarma(idTipoAlarma, idMedidaInicio):
  mycursor = mydb.cursor()
  sql = "INSERT INTO `alarmas` (`id`, `fecha`, `id_tipo_alarma`, `id_medida_inicio`, `estado`) VALUES (NULL, current_timestamp(), "+str(idTipoAlarma)+", "+str(idMedidaInicio)+", 1);"
  mycursor.execute(sql)
  mydb.commit()
  mycursor.close()

###########################################################
# Cierra la alarma generada en la base de datos
###########################################################
def cancelaAlarma(idAlarma):
  mycursor = mydb.cursor()
  sql = "UPDATE `alarmas` SET `estado` = '0' WHERE `alarmas`.`id` = "+str(idAlarma)+";"
  mycursor.execute(sql)
  mydb.commit()
  mycursor.close()

def idAlarmasActivas(idEquipo):
  mycursor = mydb.cursor()

  mycursor.execute("select alarmas_astivas.id from (SELECT * FROM `alarmas` WHERE estado=1) as alarmas_astivas inner join (SELECT * FROM `medidas` WHERE id_equipo = "+str(idEquipo)+") as medidas_equipo on  alarmas_astivas.id_medida_inicio = medidas_equipo.id")

  myresult = mycursor.fetchall()

  return myresult
  #for x in myresult:
  #  print(x)

def idMedida():
  mycursor = mydb.cursor()

  mycursor.execute("SELECT max(id) FROM `medidas` WHERE id_equipo=1")

  myresult = mycursor.fetchall()

  return myresult
###########################################################
# Ejecuta procedimiento almacenado en la base de datos
###########################################################
def insertaAlarma(idEquipo):
  mycursor = mydb.cursor()
  sql = "CALL agregarAlarma("+str(idEquipo)+");"
  mycursor.execute(sql)
  mydb.commit()
  mycursor.close()
