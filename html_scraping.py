#von Youtube Tutorial: https://youtu.be/XQgXKtPSzUI
#https://www.youtube.com/watch?v=PI1-1TtFz50 

import requests
import bs4

res = requests.get('https://display.edubs.ch/gl1')

soup = bs4.BeautifulSoup(res.text, "lxml")

for zeit in soup.select(".panel-heading"):
    print("zeit: " + zeit.text.lstrip().rstrip())

for was in soup.select(".panel-body"):
    print("was:" + was.text.lstrip().rstrip())

for wo in soup.select(".panel-footer"):
    print("wo: " + wo.text.lstrip().rstrip())


