package inputOutput;

import java.io.*;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        String path = "U:\\HND level 8 GitRepo\\RandomProjects\\Java\\test.txt";
        System.out.println("Reading from: " + path);

        // Create scanner and string builder
        Scanner scanner = new Scanner(System.in);
        StringBuilder content = new StringBuilder();

        // Step 1: Read file and store content
        try (BufferedReader reader = new BufferedReader(new FileReader(path))) {
            String line;
            while ((line = reader.readLine()) != null) {
                System.out.println(line);
                content.append(line).append("\n");
            }
        } catch (IOException e) {
            e.printStackTrace();
            return; // Stop if reading fails
        }

        // Step 2: Ask user what to replace
        System.out.print("\nWhat word to replace? ");
        String toReplace = scanner.nextLine();
        System.out.print("Replace with? ");
        String replacement = scanner.nextLine();

        // Step 3: Replace in the content
        String updatedContent = content.toString().replace(toReplace, replacement);

        // Step 4: Write updated content back to the file
        try (BufferedWriter writer = new BufferedWriter(new FileWriter(path))) {
            writer.write(updatedContent);
            System.out.println("\nFile updated and saved.");
        } catch (IOException e) {
            System.out.println("Error writing to file: " + e.getMessage());
        }
    }
}
