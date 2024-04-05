import telnetlib
#tec_tab=chr(09)
#tec_enter=chr(98)
#print("techa: " + tec_tab)
#print("techa: " + tec_enter)

host = "192.168.1.41"
user = "admin"
password = "admin"

tel = telnetlib.Telnet(host, 23, timeout=2)

print("Conexion exitosa")



#tel.interact()

texto = tel.read_until(b"Password:") #tel.read_some().decode('ascii')

print(texto)

tel.write(user.encode('ascii') + b'\t')

tel.write(password.encode('ascii')+ b'\n')

tel.write(b'2')

tel.write(b'2')

tel.write(b'\n')

tel.write(b'2')

tel.write(b'2')

tel.write(b'\n')



texto = tel.read_until(b"Tone") #tel.read_some().decode('ascii')

print(texto)



texto1 = tel.read_eager() #tel.read_some().decode('ascii')

print(texto1)


cadena=texto.decode('ascii')

pos_ini = cadena.find("[dB]:")+ 21
pos_fin = pos_ini + 10

nivel = cadena[pos_ini:pos_fin]

print(float(nivel))

#print(tel.read_some().decode('ascii'))

#

#print(tel.read_all().decode('ascii'))

print("hasta aqui todo bien")

#print(tel.read_very_eager().decode('ascii'))

#print(tel.read_some().decode('ascii'))

#print("hasta aqui todo bien")

#tel.read_until(b"Name: ", timeout=2)

tel.close()




#tel.read_until(b"Password: ")


#tel.write(b"show version\n")

#tel.write(b"exit\n")

#print(tel.read_all().decode('ascii'))

