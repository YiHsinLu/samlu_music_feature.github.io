import time

from selenium import webdriver
import os
from selenium.webdriver.common.by import By
from bs4 import BeautifulSoup
import numpy as np
import pandas as pd

match_id = [1, 7, 11, 12, 15, 25, 27, 42, 45, 48, 51, 57]

PATH = 'C:/Users/aatie/chromedriver.exe'
cService = webdriver.ChromeService(executable_path=PATH)
driver = webdriver.Chrome(service=cService)

driver.get('http://114.35.229.141/Match.aspx?CupID=19')

for i in match_id:
    Match_selection = driver.find_element('id', 'divSelect')
    all_match = Match_selection.find_elements(By.TAG_NAME, 'option')
    all_match[i].click()
    time.sleep(2)
    soup = BeautifulSoup(driver.page_source, 'html.parser')
    Match_team1 = [soup.find_all('table')[0].find_all('tr')[1].find_all('td')[0].text,
                   soup.find_all('table')[0].find_all('tr')[1].find_all('td')[1].text,
                   soup.find_all('table')[0].find_all('tr')[1].find_all('td')[2].text,
                   soup.find_all('table')[0].find_all('tr')[1].find_all('td')[3].text,
                   soup.find_all('table')[0].find_all('tr')[1].find_all('td')[4].text,
                   soup.find_all('table')[0].find_all('tr')[1].find_all('td')[5].text,
                   soup.find_all('table')[0].find_all('tr')[1].find_all('td')[6].text,
                   soup.find_all('table')[0].find_all('tr')[1].find_all('td')[7].text]

    Match_team2 = [soup.find_all('table')[0].find_all('tr')[2].find_all('td')[0].text,
                   soup.find_all('table')[0].find_all('tr')[2].find_all('td')[1].text,
                   soup.find_all('table')[0].find_all('tr')[2].find_all('td')[2].text,
                   soup.find_all('table')[0].find_all('tr')[2].find_all('td')[3].text,
                   soup.find_all('table')[0].find_all('tr')[2].find_all('td')[4].text,
                   soup.find_all('table')[0].find_all('tr')[2].find_all('td')[5].text,
                   soup.find_all('table')[0].find_all('tr')[2].find_all('td')[6].text,
                   soup.find_all('table')[0].find_all('tr')[2].find_all('td')[7].text]
    Match_result = pd.DataFrame(np.array([Match_team1, Match_team2]),
                                columns=['Team', 'set1', 'set2', 'set3', 'set4', 'set5', 'total',
                                         'sets'])
    Match_name = soup.find_all('option')[i].text
    Match_result.to_csv('C:/_YiHsin/TVL/Matches/results/' + Match_name + '.csv',
                        encoding='utf_8_sig',
                        index=False)

    Match_team1 = []
    Match_team2 = []
    Match_result = []
    time.sleep(10)

print('finished')
os.system('pause')

