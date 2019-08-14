from bs4 import BeautifulSoup
import requests 


result = requests.get("https://bulbapedia.bulbagarden.net/wiki/Nidoran%E2%99%82_(Pok%C3%A9mon)")

html = result.content
soup = BeautifulSoup(html, 'html.parser')

print(soup.prettify())