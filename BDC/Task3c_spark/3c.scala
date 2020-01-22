val t = sc.objectFile[(String, String)]("file:/home/cloudera/Desktop/Assignmentbdc/Assignmentbdc/Task3b_spark/output/InvertedIndex")
t.cache
val u = t.filter(x => x._1 == "gaylord")
u.collect

