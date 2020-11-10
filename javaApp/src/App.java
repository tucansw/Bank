import java.sql.*;

public class App {
    public static void main(String[] args) {

        try {

            Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/mysql","root","my_password");  

            Statement stmt = conn.createStatement();

            ResultSet rs = stmt.executeQuery("select * from accounts");

            while (rs.next()) {
                System.out.println(rs.getString("accID"));
            }

        } catch (Exception e) {
            System.out.println(e);
        }
        
    }
}