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

  mycursor.execute("SELECT id, nombre, ip FROM equipos WHERE estado=1")

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

  sql = "INSERT INTO `medidas` (`id`, `valor`, `fecha_hora`, `fecha`, `hora`, `id_equipo`) VALUES (NULL, '"+str(medida)+"', current_timestamp(), CURRENT_DATE(), CURRENT_TIME(), '"+str(idEquipo)+"');"
  #val = ("John", "Highway 21")
  mycursor.execute(sql)

  mydb.commit()

  #print(mycursor.rowcount, "record inserted.")

  mycursor.close()
