val lines = sc.textFile("file:/home/cloudera/Desktop/Assignmentbdc/Assignmentbdc/1millionTweets.tsv")

val b = lines.map(_.split("\t")).map(x => (x(3), x(2).toInt)).groupByKey()
val bb = b.map(x => (x._1, x._2.reduce((a,b) => Math.max(a,b))))
val bbb = bb.sortBy(x => x._2, false)

bbb.collect.take(1)
