from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker
from models import Base
from dotenv import load_dotenv
import os

# Load environment variables from the .env file
load_dotenv()

# Read database connection parameters from environment variables
db_host = os.getenv('DB_HOST')
db_port = int(os.getenv('DB_PORT', 3306))
db_name = os.getenv('DB_DATABASE')
db_user = os.getenv('DB_USERNAME')
db_password = os.getenv('DB_PASSWORD')

# Construct the database URL using the environment variables
DATABASE_URL = f"mysql+mysqlconnector://{db_user}:{db_password}@{db_host}:{db_port}/{db_name}"


# Create the database engine
engine = create_engine(DATABASE_URL, echo=True)  # Set echo=True for debugging, remove it in production

# Create a session factory
Session = sessionmaker(bind=engine)

# Create tables
Base.metadata.create_all(engine)
