#!/usr/bin/env python3
import csv
f = open('/Users/mindy/laravel-project/Lily/storage/public/lilyflower.csv', 'r')
b = open('/Users/mindy/laravel-project/Lily/storagepublic/lilyflower1.csv,'w')
writer = csv.writer(b)
next(f)
array=['process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water']
writer.writerow(array)
for row in csv.reader(f):
    #row.replace("\"","")
    for i in range(len(row)):
        row[i]=str(row[i])
    writer.writerow(row)
f.close()
b.close()
print("convertTypey sucess")