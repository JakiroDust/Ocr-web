import sqlite3
class db:
    def __init__(self):
        pass
    def _execute(self,command):
        conn = sqlite3.connect(self.database)
        conn.execute(command)
        conn.close()
    def _insert(self,command):
        conn = sqlite3.connect(self.database)
        cursor=conn.cursor()
        cursor.execute(command)
        conn.commit()
        conn.close()
    def _findCursor(self,command):
        conn = sqlite3.connect(self.database)
        cursor=conn.execute(command)
        conn.close()
        return cursor
    
class UserResultdb(db):
    _instance = None
    def __new__(cls):
        if cls._instance is None:
            cls._instance = super().__new__(cls)
            cls._instance.database = "user_result.db"
            conn = sqlite3.connect(cls._instance.database)
            conn.execute('''CREATE TABLE IF NOT EXISTS RESULT
                            (UUID CHAR(37) PRIMARY KEY UNIQUE     NOT NULL,
                            JSON CHAR(5000) NOT NULL
                            );''')
            conn.close()
        return cls._instance
    def addUserResult(self,uuid,json):
        sql_command=f"INSERT INTO RESULT (UUID,JSON) VALUES ('{uuid}','{json}')"
        self._insert(sql_command)
    def findUserResult(self,uuid):
        sql_command=f"Select * FROM RESULT WHERE UUID={uuid}"
        cursor=self._findCursor(sql_command)
        print(cursor)
    def _printTable(self):
        conn = sqlite3.connect(self.database)
        cur = conn.cursor()
        cur.execute("SELECT * FROM RESULT")
        print(cur.fetchall())
a=UserResultdb()
a.addUserResult("123e4567-e89b-12d3-a456-426614174000","1234")
a._printTable()