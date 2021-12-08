# !/usr/bin/env python

import pymysql,re,operator,os,sys,json
'''hostname = 'ftp.sgp-21.host-webserver.com'
username = 'apinet_bru'
password = '54QHbPiF'
database = 'apinet_bru'
        
myConnection = pymysql.connect( host=hostname, user=username, passwd=password, db=database ,autocommit=True)
cur = myConnection.cursor()
cur.execute( 'select request_table.user_id,student_profile.user_id,program,student_profile.distance,student_profile.pincode,hostel_type_1,hostel_type_2,room_type_1,room_type_2 from request_table,student_profile where request_table.user_id = student_profile.user_id and status="Approved"' )

phd_i = {}
phd_o = {}
distance_outside = {}
distance_delhi = {}

for r_user_id,user_id,program,distance,pincode,hostel_type_1,hostel_type_2,room_type_1,room_type_2 in cur.fetchall() :
    matchObj = re.match( r'^1100[0-9][0-9]', str(pincode))
    region = ""
    if matchObj:
        region = "Delhi"
    else:
        region = "Outside Delhi"
    print program,distance,region
    if program == "PHD" and region == "Outside Delhi":
        if user_id not in phd_o:
            phd_o[user_id]=[]
        phd_o[user_id].append(distance)
        phd_o[user_id].append(r_user_id)
        phd_o[user_id].append(hostel_type_1)
        phd_o[user_id].append(hostel_type_2)
        phd_o[user_id].append(room_type_1)
        phd_o[user_id].append(room_type_2)
    elif program == "PHD" and region == "Delhi":
        if user_id not in phd_i:
            phd_i[user_id]=[]
        phd_i[user_id].append(distance)
        phd_i[user_id].append(r_user_id)
        phd_i[user_id].append(hostel_type_1)
        phd_i[user_id].append(hostel_type_2)
        phd_i[user_id].append(room_type_1)
        phd_i[user_id].append(room_type_2)
    elif region == "Outside Delhi":
        if user_id not in distance_outside:
            distance_outside[user_id]=[]
        distance_outside[user_id].append(distance)
        distance_outside[user_id].append(r_user_id)
        distance_outside[user_id].append(hostel_type_1)
        distance_outside[user_id].append(hostel_type_2)
        distance_outside[user_id].append(room_type_1)
        distance_outside[user_id].append(room_type_2)

    else:
        if user_id not in distance_delhi:
            distance_delhi[user_id]=[]
        distance_delhi[user_id].append(distance)
        distance_delhi[user_id].append(r_user_id)
        distance_delhi[user_id].append(hostel_type_1)
        distance_delhi[user_id].append(hostel_type_2)
        distance_delhi[user_id].append(room_type_1)
        distance_delhi[user_id].append(room_type_2)

sorted_phd_i = sorted(phd_i.items(), key=lambda e: e[1][0],reverse=True)
sorted_phd_o = sorted(phd_o.items(), key=lambda e: e[1][0],reverse=True)
sorted_distance_outside = sorted(distance_outside.items(), key=lambda e: e[1][0],reverse=True)
sorted_distance_delhi = sorted(distance_delhi.items(), key=lambda e: e[1][0],reverse=True)

print json.dumps(sorted_phd_i)
print sorted_phd_o
print sorted_distance_outside
print sorted_distance_delhi



myConnection.close()'''

