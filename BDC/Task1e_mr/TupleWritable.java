import java.io.IOException;
import org.apache.hadoop.io.*;
import org.apache.hadoop.mapreduce.Mapper;
import java.io.DataInput;
import java.io.DataOutput;

// The custom tuple class that stores a key and value as integer pairs
public class TupleWritable implements WritableComparable<TupleWritable>
{
	public String edu;
	public int bal;
	
	public TupleWritable(String edu, int bal)
	{
		this.edu = edu; 
		this.bal = bal;
	}
	
	public TupleWritable(String edu)
	{
		this.edu = edu;
		this.bal = 1;
	}
	
	public TupleWritable()
	{
		this.edu = "";
		this.bal = 0;
	}

	public int compareTo(TupleWritable tuple)
	{
		int cmp = edu.compareTo(tuple.edu);
                if (cmp != 0)
		{
			return cmp;
		}
                return new Integer(tuple.bal).compareTo(this.bal);
	}
	public TupleWritable(TupleWritable other)
	{
		this.edu = other.edu;
		this.bal = other.bal;
	}
	
	// Define how to write the tuple out
	public void write(DataOutput out) throws IOException
	{
		out.writeUTF(edu);
		out.writeInt(bal);
	}
	
	// Define how to read the tuple in
	public void readFields(DataInput in) throws IOException
	{
		edu = in.readUTF();
		bal = in.readInt();
	}
	
	// Override the base Object class equality method
	@Override
	public boolean equals(Object o)
	{
		if (this == o)
		{
			return true;
		}
		if (this.edu == ((TupleWritable)o).edu)
		{
			return true;
		}
			
		return false;
	}
	
	// Define how to has this tuple (for implementation with hash sets)
	@Override
	public int hashCode()
	{
		return this.edu.hashCode();
	}
	
	// Describe the serialised string representation of the tuple
	public String toString()
	{
		return edu + " " + Integer.toString(bal);
	}
}
