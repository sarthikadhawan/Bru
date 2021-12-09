#!/usr/bin/env python

hostname = 'ftp.sgp-21.host-webserver.com'
username = 'apinet_bru'
password = '54QHbPiF'
database = 'apinet_bru'
        
import pymysql,re,operator
import json
import datetime
from itertools import chain
myConnection = pymysql.connect( host=hostname, user=username, passwd=password, db=database ,autocommit=True)
cur = myConnection.cursor()


hostel_type={}
room_type={}
cur.execute("""select id,name from hostel """)
for id,name in cur.fetchall() :
    if id not in hostel_type:
        hostel_type[id]=0
    hostel_type[id]=name

def sem() :
    month = datetime.datetime.now().month
    year = datetime.datetime.now().year
    if month==1 or month==2 or month==3 or month==4:
        return 'Winter_'+str(year)
    elif month==5 or month==6 or month==7:
        return 'Summer_'+str(year)
    else:
        return 'Monsoon_'+str(year)
  
    
sem=sem()
cur.execute( """select request_table.user_id,student_profile.id,program,student_profile.distance,student_profile.pincode,hostel_type_1,hostel_type_2,room_type_1,room_type_2 from request_table,student_profile where request_table.user_id = student_profile.id and status=0 and alloted=0 and request_table.acadsession='%s'""" % sem)

def convert(type,hid):
    a=''
    b=''
    if type=='1':
        a='Single'
    elif type=='2':
        a='Double'
    elif type=='3':
        a='Triple'
    elif type=='4':
        a='Dormitory'
    b=hostel_type[hid]
    
    return a,b
    
def insert(priority,id):
    cur.execute('update request_table set priority =%s where id=%s' % (priority,id))

phd_i = {}
phd_o = {}
distance_outside = {}
distance_delhi = {}
count=0

for r_user_id,user_id,program,distance,pincode,hostel_type_1,hostel_type_2,room_type_1,room_type_2 in cur.fetchall() :
    matchObj = re.match( r'^1100[0-9][0-9]', str(pincode))
    region = ""
    if matchObj:
        region = "Delhi"
    else:
        region = "Outside Delhi"
    print region
    if program == "PHD" and region == "Outside Delhi":
        if user_id not in phd_o:
            phd_o[user_id]=[]
            count=count+1
        phd_o[user_id].append(distance)
        phd_o[user_id].append(r_user_id)
        phd_o[user_id].append(hostel_type_1)
        phd_o[user_id].append(hostel_type_2)
        phd_o[user_id].append(room_type_1)
        phd_o[user_id].append(room_type_2)
        insert(count,r_user_id)
    elif program == "PHD" and region == "Delhi":
        if user_id not in phd_i:
            phd_i[user_id]=[]
            count=count+1
            
        phd_i[user_id].append(distance)
        phd_i[user_id].append(r_user_id)
        phd_i[user_id].append(hostel_type_1)
        phd_i[user_id].append(hostel_type_2)
        phd_i[user_id].append(room_type_1)
        phd_i[user_id].append(room_type_2)
        insert(count,r_user_id)

    elif region == "Outside Delhi":
        if user_id not in distance_outside:
            distance_outside[user_id]=[]
            count=count+1

        distance_outside[user_id].append(distance)
        distance_outside[user_id].append(r_user_id)
        distance_outside[user_id].append(hostel_type_1)
        distance_outside[user_id].append(hostel_type_2)
        distance_outside[user_id].append(room_type_1)
        distance_outside[user_id].append(room_type_2)
        insert(count,r_user_id)


    else:
        if user_id not in distance_delhi:
            distance_delhi[user_id]=[]
            count=count+1

        distance_delhi[user_id].append(distance)
        distance_delhi[user_id].append(r_user_id)
        distance_delhi[user_id].append(hostel_type_1)
        distance_delhi[user_id].append(hostel_type_2)
        distance_delhi[user_id].append(room_type_1)
        distance_delhi[user_id].append(room_type_2)
        insert(count,r_user_id)


sorted_phd_i = dict((x, y) for x, y in sorted(phd_i.items(), key=lambda e: e[1][0],reverse=True))
sorted_phd_o = dict((x, y) for x, y in sorted(phd_o.items(), key=lambda e: e[1][0],reverse=True))
sorted_distance_outside = dict((x, y) for x, y in sorted(distance_outside.items(), key=lambda e: e[1][0],reverse=True))
sorted_distance_delhi = dict((x, y) for x, y in sorted(distance_delhi.items(), key=lambda e: e[1][0],reverse=True))

#print sorted_phd_i
#print dict((x, y) for x, y in sorted_phd_o)
# print sorted_distance_outside
# print sorted_distance_delhi



myConnection.close()

'''d=dict(chain.from_iterable(d.iteritems() for d in (sorted_phd_o, sorted_phd_i,sorted_distance_outside, sorted_distance_delhi)))
r = json.dumps(d)


print r'''
# print allot_phd_o


# select * from request_table,student_profile where request_table.user_id = student_profile and program = phd