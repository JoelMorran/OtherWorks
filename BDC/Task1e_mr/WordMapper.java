import java.io.IOException;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.LongWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Mapper;

// The mapper class
public class WordMapper extends Mapper<LongWritable, Text, TupleWritable, Text>
{
  // The map method runs once for each line of text in the input file
  @Override
  public void map(LongWritable key, Text value, Context context)
  throws IOException, InterruptedException
  {
    // Get the line as a simple Java String
    String line = value.toString();

    // Split the line into words
    
    String[] Tuple = line.split(";");
    

    String tuples = Tuple[1] + ", " + Tuple[2] + ", "  + Tuple[7]; 

    context.write(new TupleWritable(Tuple[3], Integer.parseInt(Tuple[5])), new Text(tuples));
  }
}
