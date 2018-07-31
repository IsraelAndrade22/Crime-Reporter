import MySQLdb

host = "127.0.0.1"
user = "israelandrade22"
password = ""
dbName = "Final_Project"
#Open database connection
#db = MySQLdb.connect(host, user, password, dbName)
db = MySQLdb.connect(host, user, password)
#Prepare a cursor object using cursor() method
cursor = db.cursor()


# Drop table if it already exist using execute() method.
cursor.execute("DROP DATABASE IF EXISTS Final_Project")
cursor.execute("CREATE DATABASE Final_Project")
db = MySQLdb.connect(host, user, password, dbName)
#Prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute("DROP TABLE IF EXISTS Town")
cursor.execute("DROP TABLE IF EXISTS Street_Address")
cursor.execute("DROP TABLE IF EXISTS Crime_Report")
#Create table as per requirement

#CREATING TABLE
sql = """CREATE TABLE Town(
        City_Name CHAR(50),
        State_Name CHAR(50),
        City_Id INT)"""
cursor.execute(sql)


#CREATING TABLE
sql = """CREATE TABLE Street_Address(
        Street_Address CHAR(50),
        Latitude DOUBLE,
        Longitude DOUBLE,
        Zipcode INT,
        City_Id INT,
        Address_Id INT)"""
cursor.execute(sql)

#CREATING TABLE
sql = """CREATE TABLE Crime_Report(
         Crime_Description CHAR(100),
         Time CHAR(50),
         Category CHAR(50),
         Address_Id CHAR(50),
         City_Id CHAR(50))"""
cursor.execute(sql)

sql = """INSERT INTO Crime_Report"(
        (Littering around neighborhood, 9:32 PM, 4, 1, 100),
        (Jaywalking in busy street screaming that he hates the sand, 10:00 PM, 4, 1, 101),
        ("Walking dog without leash", 2:35 PM, 3, 1, 102),
        ("Feeding junk food to police horse", 3:45 PM, 5, 1, 103),
        ("Egging house", 7:45 PM, 4, 1, 104),
        )"""
#Adding infromation into Town Database
sql = """INSERT INTO Town ( City_Name, State_Name, City_Id)(
        (Salinas, California, 1),
        (Marina, California, 2),
        (Seaside, California, 3),
        (Monterey, California, 4),
        (Gonzales, California, 5),
        (Soledad, California, 6),
        (Greenfield, California, 7)
        )"""

cursor.executemany(sql)

#Adding infromation into Street_Address
sql = """INSERT INTO Street_Address VALUES(
         (1507 E Alisal St, 36.672681, -121.613232, 93905, 1, 100)
         (203 Cross Ave, 36.675443, -121.611903, 93905, 1, 101)
         (344 Williams Rd, 36.677069, -121.611506, 93905, 1, 102)
         (1285 1st Ave, 36.674247, -121.619287, 93905, 1, 103)
         (1311 E Market St, 36.675934, -121.618386, 93905, 1, 104)
         ) """
cursor.execute(sql)

# cursor.executemany("""INSERT INTO Town( City_Name, State_Name, City_Id)
    #     VALUES(%s, %s, %s ) """,
    #     [
    #     ("Salinas", "California", 1),
    #     ("Marina", "California", 2),
    #     ("Seaside", "California", 3),
    #     ("Monterey", "California", 4),
    #     ("Gonzales", "California", 5),
    #     ("Soledad", "California", 6),
    #     ("Greenfield", "California", 7)
    #   ] )