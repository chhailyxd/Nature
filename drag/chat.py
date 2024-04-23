import asyncio
import websockets #type: ignore

async def send_message():
    uri = "ws://localhost:8765"
    async with websockets.connect(uri) as websocket:
        while True:
            message = input("Enter message to send: ")
            await websocket.send(message)
            response = await websocket.recv()
            print("Server response:", response)

loop = asyncio.get_event_loop()
loop.run_until_complete(send_message())
loop.close()
