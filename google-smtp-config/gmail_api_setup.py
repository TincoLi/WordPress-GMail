#authenticate credentials
from google.oauth2 import service_account
import google.auth
import googleapiclient.discovery

SCOPES = ["https://www.googleapis.com/auth/gmail.send"]
SERVICE_ACCOUNT_FILE = "credentials.json"

def authenticate_gmail():
    creds = service_account.Credentials.from_service_account_file(
        SERVICE_ACCOUNT_FILE, scopes=SCOPES
    )
    service = googleapiclient.discovery.build("gmail", "v1", credentials=creds)
    print("✅ Gmail API authenticated!")
    return service

if __name__ == "__main__":
    authenticate_gmail()
