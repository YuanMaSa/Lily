#!/usr/bin/env python3
import cv2
import urllib
import urllib.request
import numpy as np
import ssl
import sys

x=sys.argv[1]
ssl._create_default_https_context = ssl._create_unverified_context
#url = "https://s3-ap-northeast-1.amazonaws.com/lilyflower/1500021125.jpg"
url_response = urllib.request.urlopen(x)
img_array = np.array(bytearray(url_response.read()), dtype=np.uint8)
img = cv2.imdecode(img_array, -1)
# img = cv2.imread('https://s3-ap-northeast-1.amazonaws.com/lilyflower/1500021125.jpg')

px = img[100,100]
#print(px)
hsv_px = cv2.cvtColor(img,cv2.COLOR_BGR2HSV)
hsv_px = hsv_px[100,100]
#print(hsv_px)
hsvarr = hsv_px.astype(int)
h = hsvarr[0]
s = hsvarr[1]
v = hsvarr[2]
print(str(h)+","+str(s)+","+str(v))

# -*- coding: UTF-8 -*-