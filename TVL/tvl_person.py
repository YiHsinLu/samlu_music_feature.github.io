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

Match_selection = driver.find_element('id', 'divSelect')
all_match = Match_selection.find_elements(By.TAG_NAME, 'option')
all_match[match_id[0]].click()
time.sleep(2)
soup = BeautifulSoup(driver.page_source, 'html.parser')
match_title = soup.find_all('table')[0].find_all('tr')[0].find_all('td')[2].text

print(len(soup.find_all('table')[3].find_all('tr')))

if "臺北鯨華" in soup.find_all('table')[0].find_all('tr')[1].find_all('td')[0].text:
    print(soup.find_all('table')[3].find_all('tr')[2].find_all('td')[0].text,
          soup.find_all('table')[3].find_all('tr')[2].find_all('td')[1].text,
          soup.find_all('table')[3].find_all('tr')[2].find_all('td')[2].text)
elif "臺北鯨華" in soup.find_all('table')[0].find_all('tr')[2].find_all('td')[0].text:
    print(soup.find_all('table')[4].find_all('tr')[2].find_all('td')[0].text,
          soup.find_all('table')[4].find_all('tr')[2].find_all('td')[1].text,
          soup.find_all('table')[4].find_all('tr')[2].find_all('td')[2].text)

print('finished')

players_stat = [soup.find_all('table')[3].find_all('tr')[8].find_all('td')[0].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[1].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[2].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[3].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[4].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[5].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[6].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[7].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[8].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[9].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[10].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[11].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[12].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[13].text,
                soup.find_all('table')[3].find_all('tr')[8].find_all('td')[14].text]
print(players_stat)

print(len(soup.find_all('table')[3].find_all('tr')[8].find_all('td')))

for i in [112]:
    Match_selection = driver.find_element('id', 'divSelect')
    all_match = Match_selection.find_elements(By.TAG_NAME, 'option')
    all_match[i].click()
    time.sleep(2)
    soup = BeautifulSoup(driver.page_source, 'html.parser')
    if "臺北鯨華" in soup.find_all('table')[0].find_all('tr')[1].find_all('td')[0].text:
        home_guest = 3
        guest_home = 4
    elif "臺北鯨華" in soup.find_all('table')[0].find_all('tr')[2].find_all('td')[0].text:
        home_guest = 4
        guest_home = 3
    players_stat_home = pd.DataFrame([],
                                columns=['short_number',
                                         'name',
                                         'position',
                                         'attack_points',
                                         'attack_total',
                                         'block_points',
                                         'serve_points',
                                         'serve_total',
                                         'receive_success',
                                         'receive_total',
                                         'dig_success',
                                         'dig_total',
                                         'set_success',
                                         'set_total',
                                         'points'])
    players_stat_guest = pd.DataFrame([],
                                      columns=['short_number',
                                               'name',
                                               'position',
                                               'attack_points',
                                               'attack_total',
                                               'block_points',
                                               'serve_points',
                                               'serve_total',
                                               'receive_success',
                                               'receive_total',
                                               'dig_success',
                                               'dig_total',
                                               'set_success',
                                               'set_total',
                                               'points'])
    plr_con = len(soup.find_all('table')[home_guest].find_all('tr'))-1
    for plr in range(2, plr_con):
        plr_stat = []
        stat_con = len(soup.find_all('table')[home_guest].find_all('tr')[plr].find_all('td'))
        for stat in range(stat_con):
            plr_stat = plr_stat + [soup.find_all('table')[home_guest].find_all('tr')[plr].find_all('td')[stat].text]
        players_stat_home.loc[len(players_stat_home.index)] = plr_stat

    plr_con = len(soup.find_all('table')[guest_home].find_all('tr'))-1
    for plr in range(2, plr_con):
        plr_stat = []
        stat_con = len(soup.find_all('table')[guest_home].find_all('tr')[plr].find_all('td'))
        for stat in range(stat_con):
            plr_stat = plr_stat + [soup.find_all('table')[guest_home].find_all('tr')[plr].find_all('td')[stat].text]
        players_stat_guest.loc[len(players_stat_guest.index)] = plr_stat

    players_stat = pd.concat([players_stat_home, players_stat_guest], axis=0)

    Match_name = soup.find_all('option')[i].text
    players_stat.to_csv('C:/_YiHsin/TVL/Matches/players/' + Match_name + '.csv',
                        encoding='utf_8_sig',
                        index=False)

    time.sleep(10)

os.system('pause')

