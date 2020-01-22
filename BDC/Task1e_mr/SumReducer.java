import java.io.IOException;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Reducer;

// The reducer class
public class SumReducer extends Reducer<TupleWritable, Text, TupleWritable, Text>
{
  // The reduce method runs once for each key received after the shuffle phase
  @Override
  public void reduce(TupleWritable key, Iterable<Text> values, Context context)
  throws IOException, InterruptedException
  {
    for (Text value : values)
    {
      context.write(key, value);
    }
  }
}
