from lxml.cssselect import CSSSelector
from lxml import etree


import requests 


result = requests.get("https://bulbapedia.bulbagarden.net/wiki/Nidoran%E2%99%82_(Pok%C3%A9mon)")
htmlparser = etree.HTMLParser()
tree = etree.parse(result, htmlparser)


html = result.content

td_empformbody = CSSSelector('#mw-content-text > table:nth-child(2) > tbody > tr:nth-child(1) > td > table > tbody > tr:nth-child(2) > td > table > tbody > tr:nth-child(1) > td > a > img')

print(td_empformbody[0].text)
