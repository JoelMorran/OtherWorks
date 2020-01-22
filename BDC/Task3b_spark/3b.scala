val docword = sc.textFile("file:/home/cloudera/Desktop/Assignmentbdc/Assignmentbdc/docword.txt")
val vocab   = sc.textFile("file:/home/cloudera/Desktop/Assignmentbdc/Assignmentbdc/vocab.txt")
val doc = docword.map(_.split(" ")).map(x => (x(1).toInt, (x(0).toInt, x(2).toInt))).groupByKey()
// textFile => RDD[String] => split => RDD[Array[String]] => map => RDD[(Int, (Int, Int))]

val voc = vocab.zipWithIndex.map(y => (y._2.toInt + 1, y._1))
// textFile => RDD[String] => zipWithIndex => RDD[(String, Long)] => map => RDD[(Int, String)]

val res = voc.join(doc).map(_._2)
// join => RDD[(Int, (String, (Int, Int)))] => map => RDD[(String, (Int, Int))]

val da = res.map(x => (x._1, x._2.toList.sortBy(y => -y._1)) ).sortByKey()

val out = da.saveAsObjectFile("file:/home/cloudera/Desktop/Assignmentbdc/Assignmentbdc/Task3b_spark/output/InvertedIndex")
val output = da.saveAsTextFile("file:/home/cloudera/Desktop/Assignmentbdc/Assignmentbdc/Task3b_spark/output/task3b")

