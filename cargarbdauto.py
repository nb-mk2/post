from faker import Faker
import mysql.connector
import random

# Conexión a la base de datos
conn = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="pos"
)
cursor = conn.cursor()

# Generador de datos ficticios
fake = Faker()

# Insertar 50,000 registros en la tabla
for _ in range(50000):
    product_code = fake.name() + " " + random.choice(["10kg", "20kg", "30kg", "50kg"])
    price = random.randint(100, 500)

    query = "INSERT INTO products (product_code, price) VALUES (%s, %s)"
    values = (product_code, price)
    cursor.execute(query, values)

conn.commit()

# Cerrar la conexión
cursor.close()
conn.close()