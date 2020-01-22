val lines = sc.textFile("file:/home/cloudera/Desktop/Assignmentbdc/Assignmentbdc/1millionTweets.tsv")
val a = lines.map(_.split("\t")).map(x => (x(1), x(2).toInt, x(3))).reduce((x, y) => if(x._2 > y._2){x}else{y})
println("Month: " + a._1 + ", count: " + a._2 + ", hash tag name: " + a._3)
