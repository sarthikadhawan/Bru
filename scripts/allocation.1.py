#!/usr/bin/env python

hostname = 'ftp.sgp-21.host-webserver.com'
username = 'apinet_bru'
password = '54QHbPiF'
database = 'apinet_bru'
        
print "hey"
import pymysql,re,operator
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

print sorted_phd_i
print sorted_phd_o
print sorted_distance_outside
print sorted_distance_delhi

for i in phd_o:
    cur.execute("""select * from room where room_type = '%s' and status = 0 and hostel_type = '%s'""" % (phd_o[i][4],phd_o[i][2]))
    j=cur.fetchone()
    if j!=None:
        # update status to 1 in room table
        cur.execute('update room set status = 1 where id=%s' % j[0])
        # add in alloted_students table
        cur.execute("""insert into alloted_students(user_id,room_id,hostel,room_type,room_number) values(%s,%s,'%s','%s','%s')""" % (i,j[0],j[6],j[2],j[1]))
        # status = approve in request table
      #  cur.execute("""update request_table set status='%s' ,room_id=%s where id=%s""" % ("Approved",j[0],phd_o[i][1]))
    else:
        cur.execute("""select * from room where room_type = '%s' and status = 0 and hostel_type = '%s'""" % (phd_o[i][5],phd_o[i][3]))
        j=cur.fetchone()
        if j!=None:
            # update status to 1 in room table
            cur.execute('update room set status = 1 where id=%s' % j[0])
            # add in alloted_students table
            cur.execute("""insert into alloted_students(user_id,room_id,hostel,room_type,room_number) values(%s,%s,'%s','%s','%s')""" % (i,j[0],j[6],j[2],j[1]))
            # status = approve in request table
     #       cur.execute("""update request_table set status='%s' ,room_id=%s where id=%s""" % ("Approved",j[0],phd_o[i][1]))

for i in phd_i:
    cur.execute("""select * from room where room_type = '%s' and status = 0 and hostel_type = '%s'""" % (phd_i[i][4],phd_i[i][2]))
    j=cur.fetchone()
    if j!=None:
        # update status to 1 in room table
        cur.execute('update room set status = 1 where id=%s' % j[0])
        # add in alloted_students table
        cur.execute("""insert into alloted_students(user_id,room_id,hostel,room_type,room_number) values(%s,%s,'%s','%s','%s')""" % (i,j[0],j[6],j[2],j[1]))
        # status = approve in request table
    #    cur.execute("""update request_table set status='%s' ,room_id=%s where id=%s""" % ("Approved",j[0],phd_i[i][1]))
    else:
        cur.execute("""select * from room where room_type = '%s' and status = 0 and hostel_type = '%s'""" % (phd_i[i][5],phd_i[i][3]))
        j=cur.fetchone()
        if j!=None:
            # update status to 1 in room table
            cur.execute('update room set status = 1 where id=%s' % j[0])
            # add in alloted_students table
            cur.execute("""insert into alloted_students(user_id,room_id,hostel,room_type,room_number) values(%s,%s,'%s','%s','%s')""" % (i,j[0],j[6],j[2],j[1]))
            # status = approve in request table
        #     cur.execute("""update request_table set status='%s' ,room_id=%s where id=%s""" % ("Approved",j[0],phd_i[i][1]))
        
for i in distance_outside:
    cur.execute("""select * from room where room_type = '%s' and status = 0 and hostel_type = '%s'""" % (distance_outside[i][4],distance_outside[i][2]))
    j=cur.fetchone()
    if j!=None:
        # update status to 1 in room table
        cur.execute('update room set status = 1 where id=%s' % j[0])
        # add in alloted_students table
        cur.execute("""insert into alloted_students(user_id,room_id,hostel,room_type,room_number) values(%s,%s,'%s','%s','%s')""" % (i,j[0],j[6],j[2],j[1]))
        # status = approve in request table
     #   cur.execute("""update request_table set status='%s' ,room_id=%s where id=%s""" % ("Approved",j[0],distance_outside[i][1]))
    else:
        cur.execute("""select * from room where room_type = '%s' and status = 0 and hostel_type = '%s'""" % (distance_outside[i][5],distance_outside[i][3]))
        j=cur.fetchone()
        if j!=None:
            # update status to 1 in room table
            cur.execute('update room set status = 1 where id=%s' % j[0])
            # add in alloted_students table
            cur.execute("""insert into alloted_students(user_id,room_id,hostel,room_type,room_number) values(%s,%s,'%s','%s','%s')""" % (i,j[0],j[6],j[2],j[1]))
            # status = approve in request table
        #     cur.execute("""update request_table set status='%s' ,room_id=%s where id=%s""" % ("Approved",j[0],distance_outside[i][1]))

for i in distance_delhi:
    cur.execute("""select * from room where room_type = '%s' and status = 0 and hostel_type = '%s'""" % (distance_delhi[i][4],distance_delhi[i][2]))
    j=cur.fetchone()
    if j!=None:
        # update status to 1 in room table
        cur.execute('update room set status = 1 where id=%s' % j[0])
        # add in alloted_students table
        cur.execute("""insert into alloted_students(user_id,room_id,hostel,room_type,room_number) values(%s,%s,'%s','%s','%s')""" % (i,j[0],j[6],j[2],j[1]))
        # status = approve in request table
        # cur.execute("""update request_table set status='%s' ,room_id=%s where id=%s""" % ("Approved",j[0],distance_delhi[i][1]))
    else:
        cur.execute("""select * from room where room_type = '%s' and status = 0 and hostel_type = '%s'""" % (distance_delhi[i][5],distance_delhi[i][3]))
        j=cur.fetchone()
        if j!=None:
            # update status to 1 in room table
            cur.execute('update room set status = 1 where id=%s' % j[0])
            # add in alloted_students table
            cur.execute("""insert into alloted_students(user_id,room_id,hostel,room_type,room_number) values(%s,%s,'%s','%s','%s')""" % (i,j[0],j[6],j[2],j[1]))
            # status = approve in request table
         #   cur.execute("""update request_table set status='%s' ,room_id=%s where id=%s""" % ("Approved",j[0],distance_delhi[i][1]))

myConnection.close()

# select * from request_table,student_profile where request_table.user_id = student_profile and program = phd