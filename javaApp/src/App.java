import com.mysql.jdbc.*;
import java.sql.*;
import java.util.*;

public class App {

    public static SqlConnection sqlc;
    public static void main(String[] args) throws Exception {
        sqlc = new SqlConnection("localhost/Bank");
        JFrameGUI gui = new JFrameGUI();
        // WebGUI webgui = new WebGUI();
        
        // sqlc.req("SELECT * FROM accounts");
        // System.out.println(Arrays.toString(sqlc.getColumnNames()));
    }

}
