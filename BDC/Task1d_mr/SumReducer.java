import java.io.IOException;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Reducer;

// The reducer class
public class SumReducer extends Reducer<Text, IntWritable, Text, IntWritable>
{
  // The reduce method runs once for each key received after the shuffle phase
  @Override
  public void reduce(Text key, Iterable<IntWritable> values, Context context)
  throws IOException, InterruptedException
  {
    int wordCount = 0;

    for (IntWritable value : values)
    {
      wordCount += value.get();
      
    }
    
    context.write(key, new IntWritable(wordCount));
  }
}
