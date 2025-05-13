package Test;

import static org.junit.jupiter.api.Assertions.*;

import org.junit.jupiter.api.Test;

class MainTest {
	@Test
	void testAssertTrue() {
		assertTrue(5 > 3); // Test passes
	}

	@Test
	void testAssertFalse() {
		assertFalse(2 > 5); // Test passes
	}

	@Test
	void testAssertEquals() {
		int result = 1 + 1;
		assertEquals(2, result); // Test passes
	}

	@Test
	void testAssertNotEquals() {
		int result = 5 - 2;
		assertNotEquals(10, result); // Test passes
	}

	@Test
	void testAssertNull() {
		String name = null;
		assertNull(name); // Test passes
	}

	@Test
	void testAssertNotNull() {
		String name = "JUnit";
		assertNotNull(name); // Test passes
	}

	@Test
	void testAssertSame() {
		String a = "test";
		String b = a;
		assertSame(a, b); // Test passes
	}

	@Test
	void testAssertNotSame() {
		String a = new String("test");
		String b = new String("test");
		assertNotSame(a, b); // Test passes (different instances)
	}

	@Test
	void testAssertArrayEquals() {
		int[] expected = { 1, 2, 3 };
		int[] actual = { 1, 2, 3 };
		assertArrayEquals(expected, actual); // Test passes
	}

	@Test
	void testAssertThrows() {
		assertThrows(ArithmeticException.class, () -> {
			int x = 1 / 0;
		}); // Test passes (division by zero throws exception)
	}

	@Test
	void testFail() {
		fail("This test fails intentionally."); // Always fails
	}

}
