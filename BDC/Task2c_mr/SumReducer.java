import java.io.IOException;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Reducer;

// The reducer class
public class SumReducer extends Reducer<Text, TupleWritable, Text, Text>
{
  String highestTweet = "";
  int highestDiff = 0;
  int highestC0 = 0;
  int highestC1 = 0;

  // The reduce method runs once for each key received after the shuffle phase
  @Override
  public void reduce(Text key, Iterable<TupleWritable> values, Context context)
  throws IOException, InterruptedException 
  {

    String xx = context.getConfiguration().get("month1");
    String yy = context.getConfiguration().get("month2");

    int c0 = 0;
    int c1 = 0;

    // Iterate over the values passed to us by the mapper
    for (TupleWritable value : values)
    {
      if(value.month.equals(xx))
      {
        c0 = value.count;
      }
      else if(value.month.equals(yy))
      {
        c1 = value.count;
      }
      else
      {
        throw new IOException("M_LANGER: Something is terribly wrong in your code!");
      }
    }

    // Now have count for month 1 in c1, and month 2 in c2 resp.
    int diff = c1 - c0;
    if (highestDiff < diff)
    {
      highestDiff  = diff;
      highestC0    = c0;
      highestC1    = c1;
      highestTweet = key.toString();
    }
  }

  @Override
  public void cleanup(Context context) throws IOException, InterruptedException 
  {
    String hd = ", " + highestC0 + ", " + highestC1;
    context.write(new Text(highestTweet), new Text(hd));
  }

}
