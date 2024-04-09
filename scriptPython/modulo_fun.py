# función sin parámetros o retorno de valores
def diHola():
  print("Hello!")
  

#diHola()  # llamada a la función, 'Hello!' se muestra en la consola

# función con un parámetro
def holaConNombre(name):
  print("Hello " + name + "!")

#holaConNombre("Ada")  # llamada a la función, 'Hello Ada!' se muestra en la consola

# función con múltiples parámetros con una sentencia de retorno
def multiplica(val1, val2):
  return val1 * val2

#multiplica(3, 5)  # muestra 15 en la consola

################################################
#  FUNCION QUE EXTRAE LA MEDIDA DEL EQUIPO
#  DE ARGUMENTO TIENE LA IP
################################################
import telnetlib
import time
# Configuramos los parametros para la conexion
def extrae_medida(ip):
  host = ip #"192.168.1.41"
  user = "admin"
  password = "admin"

  if len(host) < 6:
    print("la ipi no es valida")
    quit()

   
  # Conectamos al servidor  por telnet
  tel = telnetlib.Telnet(host, 23, timeout=2) # Realizamos la conexion
  tel.read_until(b"Password:")                # Esperamos a que cargue la aplicacion 
  #print("Conexion exitosa")

  # Ingresamos a la aplicacion
  tel.write(user.encode('ascii') + b'\t')     # Introducimos el usuario
  tel.write(password.encode('ascii')+ b'\n')  # Introducimos la contrasena
  #print("Se ingresaron las credenciales de acceso")

  # Seleccionamos el Status Display
  tel.write(b'2')                             # Bajamos una posicion
  tel.write(b'2')                             # Bajamos una posicion
  tel.write(b'\n')                            # Tecleamos ENTER
  #print("Seleccionamos el Status Display")

  # Seleccionamos el DVB Reciver Status
  tel.write(b'2')                             # Bajamos una posicion
  tel.write(b'2')                             # Bajamos una posicion
  tel.write(b'\n')                            # Tecleamos ENTER
  #print("Seleccionamos el DVB Reciver Status")

  # Leemos todo el texto que envia el servidor 
  texto = tel.read_until(b'Tone')             # Leemos hasta la palabra "Tone"
  #print("Leemos todo el texto que envia el servidor")

  # Formatemos el texto obtenido para obtener la medida
  cadena=texto.decode('ascii')                # Convertimos binario a ascci
  pos_ini = cadena.find("[dB]:")+ 21          # Hallamos la posicion de la cadena
  pos_fin = pos_ini + 10                      # Hallamos la posicion final de la medida
  medida = cadena[pos_ini:pos_fin]            # Obtenemos la medida
  nivel = float(medida)

  # Cerramos la conexion telnet
  tel.close()
  #print("Hasta aqui esta bien")
  time.sleep(1)
  return nivel
