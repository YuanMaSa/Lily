#!/usr/bin/env python3
import cv2
import urllib
import urllib.request
import numpy as np
import ssl
import sys
import imutils
from imutils import contours
import matplotlib.pyplot as plt


x=sys.argv[1]
ssl._create_default_https_context = ssl._create_unverified_context
#url = "https://s3-ap-northeast-1.amazonaws.com/lilyflower/1500021125.jpg"
url_response = urllib.request.urlopen(x)
img_array = np.array(bytearray(url_response.read()), dtype=np.uint8)
img = cv2.imdecode(img_array, -1)
# img = cv2.imread('https://s3-ap-northeast-1.amazonaws.com/lilyflower/1500021125.jpg')

gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
 
cnts = cv2.findContours(gray.copy(), 1, 2)
cnts = cnts[0] if imutils.is_cv2() else cnts[1]
(cnts,_) = contours.sort_contours(cnts)
a=[]
for c in cnts:
    M = cv2.moments(c)
    if M["m00"] != 0:
        cX = int(M["m10"] / M["m00"])
        cY = int(M["m01"] / M["m00"])
        a.append([cX,cY])
        # print(cX,cY)
    else:
        cX, cY = 0, 0
    
# print(a[0])
cv2.drawContours(img, [c], -1, (0, 255, 0), 2)
cv2.circle(img, (a[0][0], a[0][1]), 150, (0, 255, 0), 2)
cv2.putText(img, "center", (a[0][0], a[0][1]),
cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 255, 0), 3)
hsv_img = cv2.cvtColor(img,cv2.COLOR_BGR2HSV)
    #print(hsv_img)
circle_color = cv2.circle(hsv_img, (cX, cY), 50, (0, 255, 0), 2)
    #print(circle_color)
average_color_per_row = np.average(circle_color, axis=0)
average_color = np.average(average_color_per_row, axis=0)
# print(average_color)
# print(type(average_color))
    
hsvarr = average_color.astype(int)
h = hsvarr[0]
s = hsvarr[1]
v = hsvarr[2]
# print(h)
# print(s)
# print(v)
print(str(h)+","+str(s)+","+str(v))

# -*- coding: UTF-8 -*-

