#!/usr/bin/env python

import sys
# print "hi m here"
# print sys.argv[1]
hostname = 'ftp.sgp-21.host-webserver.com'
username = 'apinet_bru'
password = '54QHbPiF'
database = 'apinet_bru'
        
import pymysql,re,operator
import json
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
    
    
    
    
cur.execute( 'select request_table.user_id,student_profile.id,program,student_profile.distance,student_profile.pincode,hostel_type_1,hostel_type_2,room_type_1,room_type_2 from request_table,student_profile where request_table.user_id = student_profile.id and status=1 and alloted=0' )

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

# print sorted_phd_i
# print sorted_phd_o
# print sorted_distance_outside
# print sorted_distance_delhi
#update room set status =0,temp_status=0

allot_phd_o = {}

for i in phd_o:
    cur.execute("""select * from room where room_type = '%s' and status = 0 and temp_status=0 and hostel_id = %s""" % (phd_o[i][4],phd_o[i][2]))
    j=cur.fetchone()
    #id,no,type,fl,bl,st,hid,tst
    
    if j!=None:

        type,hid=convert(j[2],j[6])
        
        if str(phd_o[i][1]) not in allot_phd_o:
            allot_phd_o[str(phd_o[i][1])] = 0
        allot_phd_o[str(phd_o[i][1])] = str(j[0])+"_"+j[1]+"_"+type+"_"+hid
        cur.execute('update room set temp_status = 1 where id=%s' % j[0])

    else:
        cur.execute("""select * from room where room_type = '%s' and status = 0 and temp_status=0 and hostel_id = %s""" % (phd_o[i][5],phd_o[i][3]))
        j=cur.fetchone()
        if j!=None:
            type,hid=convert(j[2],j[6])
            
            
            if str(phd_o[i][1]) not in allot_phd_o:
                allot_phd_o[str(phd_o[i][1])] = 0
            allot_phd_o[str(phd_o[i][1])] =str(j[0])+"_"+j[1]+"_"+type+"_"+hid
            cur.execute('update room set temp_status = 1 where id=%s' % j[0])


allot_phd_i = {}

for i in phd_i:
    cur.execute("""select * from room where room_type = '%s' and status = 0 and temp_status=0 and hostel_id = %s""" % (phd_i[i][4],phd_i[i][2]))
    j=cur.fetchone()
    if j!=None:
        type,hid=convert(j[2],j[6])
       
        if phd_i[i][1] not in allot_phd_i:
            allot_phd_i[phd_i[i][1]] = 0
        allot_phd_i[phd_i[i][1]] = str(j[0])+"_"+j[1]+"_"+type+"_"+hid
        cur.execute('update room set temp_status = 1 where id=%s' % j[0])

    else:
        cur.execute("""select * from room where room_type = '%s' and status = 0 and temp_status=0 and hostel_id = %s""" % (phd_i[i][5],phd_i[i][3]))
        j=cur.fetchone()
        if j!=None:
            type,hid=convert(j[2],j[6])
            
            if phd_i[i][1] not in allot_phd_i:
                allot_phd_i[phd_i[i][1]] = 0
            allot_phd_i[phd_i[i][1]] = str(j[0])+"_"+j[1]+"_"+type+"_"+hid
            cur.execute('update room set temp_status = 1 where id=%s' % j[0])

        
allot_distance_outside = {}
for i in distance_outside:
    cur.execute("""select * from room where room_type = '%s' and status = 0 and temp_status=0 and hostel_id = %s""" % (distance_outside[i][4],distance_outside[i][2]))
    
    j=cur.fetchone()
    if j!=None:
        type,hid=convert(j[2],j[6])
        
        if distance_outside[i][1] not in allot_distance_outside:
            allot_distance_outside[distance_outside[i][1]] = 0
        allot_distance_outside[distance_outside[i][1]] = str(j[0])+"_"+j[1]+"_"+type+"_"+hid
        cur.execute('update room set temp_status = 1 where id=%s' % j[0])

    else:
        cur.execute("""select * from room where room_type = '%s' and status = 0 and temp_status=0 and hostel_id = %s""" % (distance_outside[i][5],distance_outside[i][3]))
        j=cur.fetchone()
        if j!=None:
            type,hid=convert(j[2],j[6])
            
            if distance_outside[i][1] not in allot_distance_outside:
                allot_distance_outside[distance_outside[i][1]] = 0
            allot_distance_outside[distance_outside[i][1]] = str(j[0])+"_"+j[1]+"_"+type+"_"+hid
            cur.execute('update room set temp_status = 1 where id=%s' % j[0])


allot_distance_delhi = {}

for i in distance_delhi:
    cur.execute("""select * from room where room_type = '%s' and status = 0 and temp_status=0 and hostel_id = %s""" % (distance_delhi[i][4],distance_delhi[i][2]))
    j=cur.fetchone()
    if j!=None:
        type,hid=convert(j[2],j[6])
        
        if distance_delhi[i][1] not in allot_distance_delhi:
            allot_distance_delhi[distance_delhi[i][1]] = 0
        allot_distance_delhi[distance_delhi[i][1]] = str(j[0])+"_"+j[1]+"_"+type+"_"+hid
        cur.execute('update room set temp_status = 1 where id=%s' % j[0])

    else:
        cur.execute("""select * from room where room_type = '%s' and status = 0 and temp_status=0 and hostel_id = %s""" % (distance_delhi[i][5],distance_delhi[i][3]))
        j=cur.fetchone()
        if j!=None:
            type,hid=convert(j[2],j[6])
            
            if distance_delhi[i][1] not in allot_distance_delhi:
                allot_distance_delhi[distance_delhi[i][1]] = 0
            allot_distance_delhi[distance_delhi[i][1]] = str(j[0])+"_"+j[1]+"_"+type+"_"+hid
            cur.execute('update room set temp_status = 1 where id=%s' % j[0])
            
#udana h
# cur.execute('update room set temp_status = 0')

myConnection.close()

# print allot_phd_o
# print allot_phd_i
# print allot_distance_outside
# print allot_distance_delhi

d=dict(chain.from_iterable(d.iteritems() for d in (allot_phd_o, allot_phd_i,allot_distance_outside, allot_distance_delhi)))
r = json.dumps(d)


print r
# # print allot_phd_o


# # select * from request_table,student_profile where request_table.user_id = student_profile and program = phd