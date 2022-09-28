import random
import csv
import base64
import pickle

from subprocess import *
import traceback
import time

username = 'rwvgw_qqwva'
csrf_token = 'ZeOYqqW3SD5egQP9abinZjCVolQ2jc6G'


message = check_output(
        f"php getUserInfo.php {username} {csrf_token}", shell = True, timeout = 600, universal_newlines = True)
    
print(message)