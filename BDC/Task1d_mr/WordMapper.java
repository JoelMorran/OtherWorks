import java.io.IOException;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.LongWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Mapper;

// The mapper class
public class WordMapper extends Mapper<LongWritable, Text, Text, IntWritable>
{
  // The map method runs once for each line of text in the input file
  @Override
  public void map(LongWritable key, Text value, Context context)
  throws IOException, InterruptedException
  {
    // Get the line as a simple Java String
    String line = value.toString();

    // Split the line into words
    String[] Balance = line.split(";");
    if (Integer.parseInt(Balance[5]) <= 500)
    {
      context.write(new Text("Low"), new IntWritable(1));

    }
    else if (Integer.parseInt(Balance[5]) >= 1501)
    {
      context.write(new Text("High"), new IntWritable(1));

    }
    else
    {
      context.write(new Text("Medium"), new IntWritable(1));
    }
  }
}
