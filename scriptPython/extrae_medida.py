import telnetlib
# Configuramos los parametros para la conexion
host = "192.168.1.41"
user = "admin"
password = "admin"

# Conectamos al servidor  por telnet
tel = telnetlib.Telnet(host, 23, timeout=2) # Realizamos la conexion
tel.read_until(b"Password:")                # Esperamos a que cargue la aplicacion 
print("Conexion exitosa")

# Ingresamos a la aplicacion
tel.write(user.encode('ascii') + b'\t')     # Introducimos el usuario
tel.write(password.encode('ascii')+ b'\n')  # Introducimos la contrasena
print("Se ingresaron las credenciales de acceso")

# Seleccionamos el Status Display
tel.write(b'2')                             # Bajamos una posicion
tel.write(b'2')                             # Bajamos una posicion
tel.write(b'\n')                            # Tecleamos ENTER
print("Seleccionamos el Status Display")

# Seleccionamos el DVB Reciver Status
tel.write(b'2')                             # Bajamos una posicion
tel.write(b'2')                             # Bajamos una posicion
tel.write(b'\n')                            # Tecleamos ENTER
print("Seleccionamos el DVB Reciver Status")

# Leemos todo el texto que envia el servidor 
texto = tel.read_until(b'Tone')             # Leemos hasta la palabra "Tone"
print("Leemos todo el texto que envia el servidor")

# Formatemos el texto obtenido para obtener la medida
cadena=texto.decode('ascii')                # Convertimos binario a ascci
pos_ini = cadena.find("[dB]:")+ 21          # Hallamos la posicion de la cadena
pos_fin = pos_ini + 10                      # Hallamos la posicion final de la medida
medida = cadena[pos_ini:pos_fin]            # Obtenemos la medida
print("La medida es: ")
print(float(medida))


# Cerramos la conexion telnet
tel.close()
print("Hasta aqui esta bien")


