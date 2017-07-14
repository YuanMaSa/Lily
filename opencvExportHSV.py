#!/usr/bin/env python3
import cv2
import sys
import numpy as np
x=sys.argv[1]
img = cv2.imread(sys.argv[1])
px = img[100,100]
# print(px)
hsv_px = cv2.cvtColor(img,cv2.COLOR_BGR2HSV)
hsv_px = hsv_px[100,100]
#print(hsv_px)
hsvarr = hsv_px.astype(int)
h = hsvarr[0]
s = hsvarr[1]
v = hsvarr[2]
nprint(h)
print(s)
print(v)