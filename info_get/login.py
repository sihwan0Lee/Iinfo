import random
import csv
import base64
import pickle

from subprocess import *
import traceback
import time

# 간단히 한 유저로 로그인해서 정보 가져오는지만 test하자
# 로그인도 우리가 진행시키자




username = 'rwvgw_qqwva'
password = 'bvnhqvf12'
proxy_ip = [
    '61.96.80.55:7179',
    '61.96.91.48:7179',
    '61.96.80.41:7179',
    '61.96.85.43:7179',
    '61.96.96.30:7179',
    '61.96.99.20:7179',
    '61.96.80.29:7179',
    '61.96.82.42:7179'
]

# ip 랜덤 추출
proxy_ip = random.choice(proxy_ip)
print(proxy_ip)

# 로그인 시도
try:
    print("try login")
    message = check_output(
        f"php webLogin.php {proxy_ip} {username} {password}", shell = True, timeout = 600, universal_newlines = True)
    print(message)
except KeyboardInterrupt:
    print("error")
except:
    traceback.print_exc()
    print(f"php webLogin.php {proxy_ip} {username} {password}")

if "error_message:" in message:
    print(message)
else:
    print(message)
    message = base64.b64decode(message).decode()
    import json
    from http import cookies
    message = json.loads(message)
    print(message)
    cookie = cookies.SimpleCookie()
    for elem in message:
        cookie[elem["Name"]] = elem["Value"]
        for k, v in elem.items():
            if k in ["Name", "Value", "Discard"]:
                continue
            cookie[elem["Name"]][k] = v
    #do_success_logic(username, proxy, pickle.dumps(cookie, protocol=4))
    print(username, "success!")


