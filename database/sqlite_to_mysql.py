from sqlalchemy import create_engine, text
import sqlite3

# Параметры SQLite
sqlite_file = "E:/Anime_website/anime-site/database/database.sqlite"
sqlite_conn = sqlite3.connect(sqlite_file)
sqlite_cursor = sqlite_conn.cursor()

# Параметры MySQL (удалённый сервер)
mysql_user = "root"
mysql_password = ""
mysql_host = "localhost"
mysql_port = 3306
mysql_db = "database"

# Создаём движок SQLAlchemy с нужным портом и кодировкой utf8mb4
engine = create_engine(
    f"mysql+pymysql://{mysql_user}:{mysql_password}@{mysql_host}:{mysql_port}/{mysql_db}?charset=utf8mb4"
)
mysql_conn = engine.connect()
print("Подключение к MySQL прошло успешно ✅")
