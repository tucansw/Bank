import com.mysql.jdbc.*;
import java.sql.*;
import java.util.*;

public class App {

    public static void main(String[] args) throws Exception {
        SqlConnection sqlc = new SqlConnection("localhost/Bank");
        
        sqlc.req("SELECT * FROM accounts");

        System.out.println(Arrays.toString(sqlc.getColumnNames()));
    }

}
