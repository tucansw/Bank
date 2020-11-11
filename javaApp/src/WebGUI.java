import java.io.File;
import java.io.IOException;
import java.awt.Desktop;

public class WebGUI {

    public WebGUI() {
        File htmlFile = new File("html/index.html");
        try {
            Desktop.getDesktop().browse(htmlFile.toURI());
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

}
