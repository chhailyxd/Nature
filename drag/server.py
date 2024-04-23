import asyncio
import websockets

async def handle_message(websocket, message):
    response = f"Server received: {message}"
    await websocket.send(response)

async def receive_message(websocket, path):
    async for message in websocket:
        await handle_message(websocket, message)

async def start_server():
    server = await websockets.serve(receive_message, "localhost", 8765)
    await server.wait_closed()

# Create an event loop and run the server
loop = asyncio.get_event_loop()
loop.run_until_complete(start_server())
loop.close()
