import java.io.IOException;
import org.apache.hadoop.io.*;
import org.apache.hadoop.mapreduce.Mapper;
import java.io.DataInput;
import java.io.DataOutput;

// The custom tuple class that stores a key and value as integer pairs
public class TupleWritable implements WritableComparable<TupleWritable>
{
	public String month;
	public int count;
	
	public TupleWritable(String month, int count)
	{
		this.month = month; 
		this.count = count;
	}
	
	public TupleWritable(String month)
	{
		this.month = month;
		this.count = 1;
	}
	
	public TupleWritable()
	{
		this.month = "";
		this.count = 0;
	}

	public int compareTo(TupleWritable tuple)
	{
		int cmp = month.compareTo(tuple.month);
                if (cmp != 0)
		{
			return cmp;
		}
                return new Integer(tuple.count).compareTo(this.count);
		//this.count = tuple.count;
		//if (this.count > tuple.count)
		//{
		//	return this.count;
		//}
		/*else
		{
			return tuple.count;
		}*/
	}
	public TupleWritable(TupleWritable other)
	{
		this.month = other.month;
		this.count = other.count;
	}
	
	// Define how to write the tuple out
	public void write(DataOutput out) throws IOException
	{
		out.writeUTF(month);
		out.writeInt(count);
	}
	
	// Define how to read the tuple in
	public void readFields(DataInput in) throws IOException
	{
		month = in.readUTF();
		count = in.readInt();
	}
	
	// Override the base Object class equality method
	@Override
	public boolean equals(Object o)
	{
		if (this == o)
		{
			return true;
		}
		if (this.month == ((TupleWritable)o).month)
		{
			return true;
		}
			
		return false;
	}
	
	// Define how to has this tuple (for implementation with hash sets)
	@Override
	public int hashCode()
	{
		return this.month.hashCode();
	}
	
	// Describe the serialised string representation of the tuple
	public String toString()
	{
		return "(" + month + " " + Integer.toString(count) + ")";
	}
}
