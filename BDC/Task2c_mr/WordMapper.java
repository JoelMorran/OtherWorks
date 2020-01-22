import java.io.IOException;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.LongWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Mapper;

// The mapper class
public class WordMapper extends Mapper<LongWritable, Text, Text, TupleWritable>
{
  // The map method runs once for each line of text in the input file
  @Override
  public void map(LongWritable key, Text value, Context context)
  throws IOException, InterruptedException
  {
    String month1 = context.getConfiguration().get("month1");
    String month2 = context.getConfiguration().get("month2");

    String line = value.toString();

    String[] tuple = line.split("\\t");
    String tag = tuple[3]; 
    String mon = tuple[1];

    if (mon.equals(month1) || mon.equals(month2))
    {
      context.write(new Text(tag), new TupleWritable(mon, Integer.parseInt(tuple[2])));
    }
  }
}
