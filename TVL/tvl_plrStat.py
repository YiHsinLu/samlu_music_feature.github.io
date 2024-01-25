import time

from selenium import webdriver
import os
from selenium.webdriver.common.by import By
from bs4 import BeautifulSoup
import numpy as np
import pandas as pd

players_stat = pd.DataFrame([],
                            columns=[
                                'team',
                                'no_player',
                                'sets',
                                'attack_total',
                                'attack_points',
                                'block_points',
                                'serve_total',
                                'serve_points',
                                'receive_total',
                                'receive_success',
                                'dig_total',
                                'dig_success',
                                'set_total',
                                'set_success',
                                'points'
                            ])

PATH = 'C:/Users/aatie/chromedriver.exe'
cService = webdriver.ChromeService(executable_path=PATH)
driver = webdriver.Chrome(service=cService)

for team in range(6, 10):
    driver.get('http://114.35.229.141/Player.aspx?CupID=19')
    team_selection = driver.find_element('id', 'divSelect')
    all_team = team_selection.find_elements(By.TAG_NAME, 'option')
    all_team[team].click()
    print(all_team[team].text)
    player_selection = driver.find_element('id', 'playerSelect')
    all_player = player_selection.find_elements(By.TAG_NAME, 'option')
    numbers_plr = len(all_player)
    for plr in range(numbers_plr):
        print(all_player[plr].text)
        all_player[plr].click()
        time.sleep(2)
        soup = BeautifulSoup(driver.page_source, 'html.parser')
        plr_stat = [all_team[team].text, all_player[plr].text]
        for i in range(1, 14):
            stat = soup.find_all('table')[0].find_all('tr')[len(soup.find_all('table')[0].find_all('tr')) - 1].find_all('td')[i].text
            plr_stat = plr_stat + [stat]
        players_stat.loc[len(players_stat.index)] = plr_stat
        time.sleep(10)
    time.sleep(10)


players_stat.to_csv('C:/_YiHsin/TVL/Matches/players/PlayersStat.csv', encoding='utf_8_sig', index=False)

print('finished')
os.system('pause')

